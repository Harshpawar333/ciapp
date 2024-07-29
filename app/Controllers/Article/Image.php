<?php

namespace App\Controllers\Article;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ArticleModel;
use App\Entities\Article;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;
use finfo;

class Image extends BaseController
{
    private ArticleModel $model;
    public function __construct()
    {
        $this->model = new ArticleModel();
    }
    public function new($id)
    {
        $article=$this->getArticle0or404($id);
        return view("Article/Image/new",[
            "article" => $article,
        ]);
    }
    public function create($id){
        $article=$this->getArticle0or404($id);
        $file=$this->request->getFile("image");

        if(! $file->isValid()){
            $error_code=$file->getErrorString();
            if($error_code!==null){
                return redirect()->back()
                                ->with("errors",["$error_code"]);
            }
            throw new RuntimeException($file->getErrorString()." ".$error_code);

        }
        if($file->getSizeByUnit('mb')>2)   {
            return redirect()->back()
            ->with('errors',['File too Large']);
        }
        if(! in_array($file->getMimeType(),["image/png","image/jpeg"])){
            return redirect()->back()
            ->with("errors",["Invalid File Format"]);
        }
        $path=$file->store("article_images");
        $path=WRITEPATH."uploads/".$path;
        service("image")
            ->withFile($path)
            ->fit(200,200,"centre")
            ->save($path);
        $article->image=$file->getName();
        $this->model->protect(false)
                    ->save($article);
        return redirect()->to("articles/$id")
        ->with("message","Image Uploaded");
    }
    public function get($id){
        $article=$this->getArticle0or404($id); 
        if($article->image){
            $path=WRITEPATH."uploads/article_images/".$article->image;
            $finfo = new finfo(FILEINFO_MIME);
            $type=$finfo->file($path);
            header("Content-Type: $type");
            header("Content-Length: ". filesize($path));
            readfile($path);
            exit;
        }
    
    }
    public function delete($id){
        $article=$this->getArticle0or404($id);
        $path =  WRITEPATH . "uploads/article_images/".$article->image;

        if(is_file($path)){
         unlink($path);
        }
        $article->image=null;
        $this->model->protect(false)->save($article);
        return redirect()->to("articles/$id")
        ->with("message","Image Removed");
    }

    private function getArticle0or404($id): Article
    {
        $article = $this->model->find($id);
        if ($article === null) {
            throw new PageNotFoundException("Article with id $id not found");
        }
        return $article;
    }
    
}
