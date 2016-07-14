<?php

class SV_UserTaggingImprovements_XenForo_Model_Report extends XFCP_SV_UserTaggingImprovements_XenForo_Model_Report
{
    public function alertTaggedMembers(array $report, array $reportComment, array $tagged, array $alreadyAlerted, array $taggingUser)
    {
        $userTaggingModel = $this->_getUserTaggingModel();
        $alertedUsers = parent::alertTaggedMembers($report, $reportComment, $tagged, $alreadyAlerted, $taggingUser);
        $userTaggingModel->emailAlertedUsers('report', $reportComment['report_id'], $reportComment, $alertedUsers, $taggingUser);
        return $alertedUsers;
    }

    protected function _getUserTaggingModel()
    {
        return $this->getModelFromCache('XenForo_Model_UserTagging');
    }
}
