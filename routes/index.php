<?php

use App\Http\Actions\Web;

/**
 *------------------------------------------------------------------------------
 *
 *  Homepage
 *
 */

$r->get('index', '/', Web\Index\Action::class);
