<?php
     namespace App\View\Components\Forms;

    use Illuminate\View\Component;

    class Alert extends Component{
        /**
         * @return void
        */

    }
    public function _construct(public string $message){
        //
    }
    /**
     * @return Illuminate\Contract\View
     */

    public function render(){
        return  view('components.alert');
    }


?>
