<?php
class BsInputGroupAddonRadio extends BsElement
{
    public function render()
    {
        $this->strBuffer = "";
        $this->strBuffer .= "<input type='radio' aria-label='...'>";
    }
}

/*
Input with multiple button :
############################

<div class="input-group">
    <div class="input-group-btn">
    <!-- Buttons -->
    <button class="btn btn-default" aria-label="Bold" type="button">
    <span class="glyphicon glyphicon-bold"></span>
    </button>
    <button class="btn btn-default" aria-label="Italic" type="button">
    <span class="glyphicon glyphicon-italic"></span>
    </button>
    </div>
    <input type="text" class="form-control" aria-label="...">
</div>
*/