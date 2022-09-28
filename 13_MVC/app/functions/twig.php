<?php

$this->functions[] = $this->functionsToView('user', function(){
    return 'user data';
});

$this->functions[] = $this->functionsToView('test', function(){
    return 'test data';
});