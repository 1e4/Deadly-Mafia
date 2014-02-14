<?php
/**
 * The past is a ghost, the future a dream. All we ever have is now. –Bill Cosby.
 * @author: Ian <brokenlust@live.co.uk>
 * @version 1
 * @package DeadlyMafia
 * @copyright Deadly Mafia 2014
 */
class RankConfig
{

    public static $ranks = array(
        0 => array(
            'name'  =>  'Scum'
        ),
        1 => array(
            'name'  =>  'Goon'
        )
    );

    public static function rank($rank)
    {

        //Check if they have a valid rank
        if(isset(self::$ranks[$rank]))
            return self::$ranks[$rank]['name'];
        else
            return 'Scum';

    }

    public static function wealth($wealth)
    {

        if($wealth >= 0 && $wealth < 5000) //up to 5000
            return 'Flat broke';
        elseif($wealth >= 0 && $wealth < 50000) //up to 50,000
            return 'Lower Class';
        elseif($wealth >= 50000 && $wealth < 100000) // up to 100,000
            return 'Middle Class';
        elseif($wealth >= 100000 && $wealth < 250000) // up to 250,000
            return 'High Class';


        //Maybe in the future, expand these ranks
//        if($wealth >= 0 && $wealth < 5000) //up to 5000
//            return 'Flat broke';
//        elseif($wealth >= 0 && $wealth < 50000) //up to 50,000
//            return 'Still begging for change';
//        elseif($wealth >= 50000 && $wealth < 100000) // up to 100,000
//            return 'Minimum Wage';
//        elseif($wealth >= 100000 && $wealth < 250000) // up to 250,000
//            return 'Entropanur';
//        elseif($wealth >= 250000 && $wealth < 500000) //up to 500,000
//            return 'Successful Entropanur';
//        elseif($wealth >= 500000 && $wealth < 1000000) // up to 1,000,000
//            return 'Business class';
//        elseif($wealth >= 1000000 && $wealth < 5000000) // up to 5,000,000
//            return 'Elite Business Class';
//        elseif($wealth >= 5000000 && $wealth < 10000000) // up to 10,000,000
//            return 'Burns ';
//        elseif($wealth >= 10000000 && $wealth < 30000000) // up to 30,000,000
//            return '';
//        elseif($wealth >= 30000000 && $wealth < 50000000) // up to 50,000,000
//            return '';
//        elseif($wealth >= 600000000 && $wealth < 100000000) //up to 100,000,000
//            return '';
//        elseif($wealth >= 1000000000 && $wealth < 200000000) // up to 200,000,000
//            return '';
//        elseif($wealth >= 1000000000 && $wealth < 500000000) // up to 500,000,000
//            return '';
//        elseif($wealth >= 1000000000 && $wealth < 1000000000) // up to 1,000,000,000
//            return '';
//        elseif($wealth >= 1000000000) // anything over 1,000,000,000
//            return '';

    }

}