<?php
function isDuplicate($request)
{
    $taskDuplicate = DB::table('tasks')
                            ->where('task_name', $request->task_name)
                            ->where('location', $request->location)
                            ->whereDate('date', $request->date)
                            ->count();
    return $taskDuplicate;
}
