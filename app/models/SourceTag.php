<?php

class SourceTag extends Eloquent {

    protected $table = 'source_tag';
    protected $fillable = array('source_id', 'tag_id');
    
}