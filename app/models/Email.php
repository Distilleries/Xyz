<?php

class Email extends \Distilleries\Expendable\Models\BaseModel implements \Distilleries\Expendable\Contracts\MailModelContract {

    use \Distilleries\Expendable\Models\StatusTrait;
    protected $fillable = [
        'libelle',
        'body_type',
        'action',
        'cc',
        'bcc',
        'content',
        'status',
    ];

    public function initByTemplate($view)
    {
        return $this->where('action', '=', $view)->get()->last();
    }

    public function getTemplate($view)
    {
        if (!empty($this->action))
        {
            return $this->content;
        }

        return '';
    }

    public function getBcc()
    {
        return !empty($this->bcc) ? explode(',', $this->bcc) : [];
    }

    public function getSubject()
    {
        return $this->libelle;
    }

    public function getCc()
    {
        return !empty($this->cc) ? explode(',', $this->cc) : [];
    }

    public function getPlain()
    {
        return strtolower($this->body_type);
    }


}