<?php

namespace Entity;

class Admin extends User
{
    public function isAdmin(): bool
    {
        return true;
    }
}
