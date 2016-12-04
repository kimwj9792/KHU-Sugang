<?php

class Session
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        session_set_save_handler(
            array($this, 'open'),
            array($this, 'close'),
            array($this, 'read'),
            array($this, 'write'),
            array($this, 'destroy'),
            array($this, 'gc')
        );
        session_start();
    }

    public function open()
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($id)
    {
        $data = $this->db->get('session','data',[
            'id' => $id
        ]);
        return $data;
    }

    public function write($id, $data)
    {
        if ($this->db->count('session', ['id' => $id]) == 1) {
            $this->db->update('session',[
                'access' => time(),
                'data' => $data
            ],[
                'id' => $id
            ]);
        } else {
            $this->db->insert('session',[
                'id' => $id,
                'access' => time(),
                'data' => $data
            ]);
        }
        return true;
    }

    public function destroy($id)
    {
        $this->db->delete('session',[
            'id' => $id
        ]);
        return true;
    }

    public function gc($max)
    {
        $this->db->delete('session',[
            'access[<]' => time() - $max
        ]);
        return true;
    }
}