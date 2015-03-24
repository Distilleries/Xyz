<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model implements \Distilleries\MailerSaver\Contracts\MailModelContract {

    protected $fillable = [
        'libelle',
        'body_type',
        'action',
        'cc',
        'bcc',
        'content',
        'status',
    ];

    /**
     * @param $view
     * @return mixed
     */
    public function initByTemplate($view)
    {
        return $this->where('action', '=', $view);
    }

    /**
     * @param $view
     * @return string
     */
    public function getTemplate($view)
    {
        if (!empty($this->action))
        {
            return $this->content;
        }

        return '';
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        return !empty($this->bcc) ? explode(',', $this->bcc) : [];
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->libelle;
    }

    /**
     * @return array
     */
    public function getCc()
    {
        return !empty($this->cc) ? explode(',', $this->cc) : [];
    }

    /**
     * @return string
     */
    public function getPlain()
    {
        return strtolower($this->body_type);
    }
}