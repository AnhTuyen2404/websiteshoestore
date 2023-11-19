<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Wards;
use App\Models\Feeship;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveryController extends Controller
{
    public function updateDelivery(Request $request){
		$data = $request->all();
		$fee_ship = Feeship::find($data['feeship_id']);
		$fee_value = rtrim($data['fee_value'],'.');
		$fee_ship->fee_price = $fee_value;
		$fee_ship->save();
	}
    public function deleteDElivery(Request $request){
        $data = $request->all();
        $feeship_id = Feeship::find($data['feeship_id']);
        $feeship_id->delete();
        
    }
    
	public function selectFeeship(){
        $feeship = Feeship::orderby('feeship_id','DESC')->get();
        $output = '';
        $output .= '
            <div class="table-responsive">  
                <table class="table table-bordered">
                    <thread> 
                        <tr>
                            <th>Tên thành phố</th>
                            <th>Tên quận huyện</th> 
                            <th>Tên xã phường</th>
                            <th>Phí ship</th>
                            <th>Action</th>
                        </tr>  
                    </thread>
                    <tbody>
                    ';
    
                    foreach($feeship as $fee){
    
                    $output.='
                        <tr>
                            <td>'.$fee->city->name_city.'</td>
                            <td>'.$fee->province->name_quanhuyen.'</td>
                            <td>'.$fee->wards->name_xaphuong.'</td>
                            <td contenteditable data-feeship_id="'.$fee->feeship_id.'" class="fee_feeship_edit">'.number_format($fee->fee_price,0,',','.').'</td>
                            <td><button type="button" class="btn btn-danger btn-sm delete_feeship" data-feeship_id="'.$fee->feeship_id.'">Xóa</button></td>
                        </tr>
                        ';
                    }
    
                    $output.='        
                    </tbody>
                </table>
            </div>
        ';
    
        echo $output;
    }
    
	public function insertDelivery(Request $request){
		$data = $request->all();
		$fee_ship = new Feeship();
		$fee_ship->fee_matp = $data['city'];
		$fee_ship->fee_maqh = $data['province'];
		$fee_ship->fee_xaid = $data['wards'];
		$fee_ship->fee_price = $data['fee_ship'];
		$fee_ship->save();
        Alert::success('Add fee delivery success');
	}
    public function delivery(Request $request){

    	$city = City::orderby('matp','ASC')->get();

    	return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    
    public function selectDelivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as  $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
    			}

    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as  $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		}
    		echo $output;
    	}
    	
    }

}
