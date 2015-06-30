<?php

class SV_UserTaggingImprovements_XenForo_DataWriter_User extends XFCP_SV_UserTaggingImprovements_XenForo_DataWriter_User
{
    protected function _getFields()
    {
        $fields = parent::_getFields();
        $fields['xf_user_option']['sv_email_on_tag'] = array('type' => self::TYPE_BOOLEAN, 'default' => 0);
        return $fields;
    }

    protected function _preSave()
    {
        if (!empty(SV_UserTaggingImprovements_Globals::$PublicAccountController))
        {
            $input = SV_UserTaggingImprovements_Globals::$PublicAccountController->getInput();
            $this->set('sv_email_on_tag', $input->filterSingle('sv_email_on_tag', XenForo_Input::UINT));
        }

        parent::_preSave();
    }
}