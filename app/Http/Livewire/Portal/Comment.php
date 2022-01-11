<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Comment extends Component
{
    private $comment;
    private $time_ago;

    public function mount($comment)
    {
        $this->comment = $comment;
        $this->time_ago = $this->get_time_ago(strtotime($comment->created_at));
    }

    public function render()
    {
        return view('livewire.portal.comment', [
            'comment' => $this->comment,
            'time_ago' => $this->time_ago,
        ]);
    }

    public function get_time_ago( $time )
    {
        $time_difference = time() - $time; 
    
        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return ' ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
}
