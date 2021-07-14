<?php


class systemUsage
{
    public function get_server_cpu_usage(){
        $load = sys_getloadavg();
        return round($load[0], 2);
    }

    function get_server_memory_usage(){

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = round($mem[2]/$mem[1]*100, 2);

        return $memory_usage;
    }
    function get_server_disk_usage(){
        return  round(((disk_total_space("/") - disk_free_space("/")) / disk_total_space("/")) * 100, 2);
    }
}