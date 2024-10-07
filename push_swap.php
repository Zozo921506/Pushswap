<?php
function sa(array &$array)
{
    $index1 = 0;
    $index2 = 1;
    $temp = $array[$index1];
    $array[$index1] = $array[$index2];
    $array[$index2] = $temp;
    echo "sa";
}

function sb(array &$array)
{
    $index1 = 0;
    $index2 = 1;
    $temp = $array[$index1];
    $array[$index1] = $array[$index2];
    $array[$index2] = $temp;
    echo "sb";
}

function sc(array &$array, array &$tab)
{
    $index1 = 0;
    $index2 = 1;
    $tmp = $array[$index1];
    $array[$index1] = $array[$index2];
    $array[$index2] = $tmp;
    $temp = $tab[$index1];
    $tab[$index1] = $tab[$index2];
    $tab[$index2] = $temp;
    echo "sc";
}

function pa(array &$array, array &$tab = [])
{
    $index = 0;
    $tmp = array($array[$index]);
    unset($array[$index]);
    array_splice($tab, $index, 0, $tmp);
    $array = array_values($array);
    echo "pa";
}

function pb(array &$array, array &$tab = [])
{
    $index = 0;
    $tmp = $array[$index];
    unset($array[$index]);
    array_splice($tab, $index, 0, $tmp);
    $array = array_values($array);
    echo "pb";
}

function ra(array &$array)
{
    $index = 0;
    $tmp = $array[$index];
    unset($array[$index]);
    $array = array_values($array);
    array_push($array, $tmp);
}

function rb(array &$array)
{
    $index = 0;
    $tmp = $array[$index];
    unset($array[$index]);
    $array = array_values($array);
    array_push($array, $tmp);
}

function tri(array &$la)
{
    $la = array_values($la);
    $lb = [];
    $sorted = $la;
    sort($sorted);
    if ($la === $sorted)
    {
        echo "\n";
    }
    elseif (sizeof($la) == 2)
    {
        if ($la[0] < $la[1] || $la[0] == $la[1])
        {
            echo "\n";
        }
        else
        {
            sa($la);
            echo "\n";
        }
    }
    elseif (sizeof($la) == 1)
    {
        echo "\n";
    }
    else
    {
        while (sizeof($la) > 0)
        {
            if (sizeof($la) == 1)
            {
                pb($la, $lb);
                echo " ";
            }
            elseif ($la[0] < $la[1])
            {
                pb($la, $lb);
                echo " ";
                if (sizeof($lb) > 1)
                {
                    if ($lb[0] > $lb[1])
                    {
                        continue;
                    }
                    else
                    {
                        sb($lb);
                        echo " ";
                    }
                }
                else
                {
                    continue;
                }
            }
            elseif ($la[0] > $la[1])
            {
                sa($la);
                echo " ";
                pb($la, $lb);
                echo " ";
                if (sizeof($lb) > 1)
                {
                    if ($lb[0] < $lb[1])
                    {
                        sb($lb);
                        echo " ";
                    }
                    else
                    {
                        continue;
                    }
                }
                else
                {
                    continue;
                }
            }
            else
            {
                pb($la, $lb);
                echo " ";
                if (sizeof($lb) > 1)
                {
                    if ($lb[0] < $lb[1])
                    {
                        sb($lb);
                        echo " ";
                    }
                    else
                    {
                        continue;
                    }
                }
                else
                {
                    continue;
                }
            }
        }
        
        while (sizeof($lb) > 0)
        {
            if (sizeof($lb) == 1)
            {
                if ($la[0] > $la[1])
                {
                    sa($la);
                    echo " ";
                }
                pa($lb, $la);
            }
            elseif ($lb[0] < $lb [1] && $la[0] > $la[1])
            {
                sc($la, $lb);
                echo " ";
            }
            elseif ($lb[0] < $lb [1])
            {
                sb($lb);
                echo " ";
            }
            else
            {
                pa($lb, $la);
                echo " ";
            }
        }
        if ($la === $sorted)
        {
            echo "\n";
        }
        else
        {
            echo " ";
            tri($la);
        }
    }
}

unset($argv[0]);
tri($argv);