<?php

class ArticleModel extends CI_Model
{
    public $id = null;
    public $title = null;
    public $content = null;
    public $files = null;
    public $created_at = '';
    public $updated_at = '';

    protected $table = 'articles';

    function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function find($id)
    {
        $this->id = $id;
        $db =  $this->db->get_where($this->table, ['id' => $this->id])->row();

        $this->title = $db->title;
        $this->content = $db->content;
        $this->files = $db->files;

        return $db;
    }

    public function save()
    {
        if($this->id == null) {
            $data = [
                'title'      => $this->title,
                'content'    => $this->content,
                'files'      => $this->files,
                'created_at' => time(),
                'updated_at' => time()
            ];
            return $this->db->insert($this->table, $data);
        }else {

            $data = [
                'title'      => $this->title,
                'content'    => $this->content,
                'files'      => $this->files,
                'updated_at' => time()
            ];
            return $this->db->set($data)->where(['id' => $this->id])->update($this->table);
        }
    }

    public function delete()
    {
        return $this->db->delete($this->table, ['id' => $this->id]);
    }
}