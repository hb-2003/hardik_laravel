<?php
function navbar($page = [])
{
    return ((request()->routeIs($page)) ? 'active' : '');
}
