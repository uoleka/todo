<?php
/**
 * Check if the specified model already contains the variables.
 * @param  object  $task
 * @param  array   $tablesFields
 * @param  string  $firstVariable
 * @param  string  $secondVariable
 * @param  string  $thirdVariable
 * @return boolean
 */
function isDuplicate($task, $tableFields, $firstVariable, $secondVariable, $thirdVariable)
{
    $taskDuplicate = $task::where($tableFields[0], $firstVariable)
                            ->where($tableFields[1], $secondVariable)
                            ->whereDate($tableFields[2], $thirdVariable)
                            ->count();
    if ($taskDuplicate) {
        return true;
    } else {
        return false;
    }
    
}
