<?php

namespace App\Http\Controllers;

use Auth;
use App\custom_section;
use App\page_builderDetails;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ajaxController extends Controller
{
    //public function builder($id)
    //{
        //$section_use=custom_section::find($id);
        //return view ('pages.admin-pagebuilder',['section_use'=>$section_use]);
    //}   

    public function dynamicpages()
    {
        $all_dynamic=page_builderDetails::all();
        return view ('pages.admin-allPages',['all_dynamic'=>$all_dynamic]);
    }

    public function pages(Request $request,$pagename)
    { 
        $data =[];
        $page_details=page_builderDetails::all()->where('page_name', $pagename);
        //$page=json_decode($page_details,true);
        //print_r($page);
        $data['page']= $page_details;
        //print($data['page']);
        #exit();
        //echo '<br>'; echo '<br>'; echo '<br>';
        foreach($page_details as $ids)
        {           
            //echo '<br>';
            //echo '<br>';
            $section_details=custom_section::all()->where('id', $ids->section_ids);
            $section=json_decode($section_details);
            //$sectiondata[]= $section;
            $data['section'][]= $section;
        }
        #print_r($data['page']);
        #echo '<br>';
        #echo '=================================================================';
        #echo '<br>';echo '<br>';echo '<br>';
        #print_r($data['section']);
        #echo '<br>';
        #echo '=================================================================';
        #echo '<br>';echo '<br>'; echo '<br>';echo '<br>';

        //print_r($data['section'][0]);
        #foreach($data['section'][0] as $ids)
        #{           
            #echo '<br>';            echo '--------------------------';            echo '<br>';            echo '<br>';
            #print_r($ids);
            #echo '<br>';
            #echo '<br>';
            #print_r($ids->elements);
        #}

        #echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
        //print_r($data['section'][1]);

        #foreach($data['section'][1] as $ids)
        #{           
            #echo '<br>';            echo '--------------------------';            echo '<br>';            echo '<br>';
            #print_r($ids);
            #echo '<br>';
            #echo '<br>';
            #print_r($ids->elements);
            #echo '<br>';
            #echo '<br>';
            #$section=json_decode($ids->elements);
            #print_r($section[0]);
            #echo '<br>';
            #print_r($section[0]->name);
        #}
        //exit();
        if($pagename == 'Contact')
        {
            return view ('pages.admin-pagebuilder-ex',$data);
        }
        else if($pagename == 'Profile')
        {
            return view ('pages.admin-pagebuilder',$data);
        }
        else
        {
            return view ('pages.admin-pagebuilder-ex1');
        }
        //return view ('pages.admin-pagebuilder',$data);
    }

    public function builder(Request $request)
    {
        //  Let's do everything here
        $allsection=$request->section;
        $allpagename=$request->pagename;
        
        #print_r($request->file('favicon')->isValid());
        #exit();
        if ($request->file('favicon')->isValid()) {
            //
            $validated = $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);
            $extension = $request->favicon->extension();
            #$request->image->move(public_path('images'),$request->name.".".$extension);
            #$request->image->storeAs('images',$request->name.".".$extension, 's3');
            $request->favicon->storeAs('/public', $request->pagename.".".$extension);
            $favicon = Storage::url($request->pagename.".".$extension);
        }
        $allfavicon=$favicon;
        $allurl=$request->url;
        $alltitle=$request->title;
        $alldesc=$request->desc;
        $allkey=$request->key;
        //print_r($allsection);
        //echo '<br>';
        #print_r($allpagename);
        #print_r($alltitle);
        #print_r($alldesc);
        #print_r($allkey);
        //exit();
        $validator = Validator::make($request->all(),
        [
            'section' => 'required|integer',
            'pagename' => 'required', 'string','max:20',
            'url' => 'required', 'string',
            'title' => 'required', 'string','max:20',
            'desc' => 'string','max:50',
            'key' => 'string','max:50',
        ]);
        if ($validator) 
            {        //Split int char array
                $arr = explode(",", $allsection);
                foreach($arr as $char)
                {
                    //print_r($char);
                    $newSection = page_builderDetails::create([ 
                        'section_ids' =>$char,
                        'page_name' => $allpagename,
                        'page_url' => $allurl,
                        'page_favicon' => $allfavicon,
                        'page_title' => $alltitle,
                        'page_desc' => $alldesc,
                        'page_key' => $allkey,
                    ]);
                }
            }
            $page_details = page_builderDetails::select('page_name')->distinct()->get();
            return redirect()->route('pagesection',['page_use'=>$page_details])->with('status','Page SuccessFully Created');
    }
    

    public function sectiondelete($id)
    {
        #print_r($id);
        #exit();
        custom_section::destroy($id);
        //return view('pages.admin-pageSection');
        return redirect()->route('pagesection')->with('status','Session SuccessFully Deleted');
    }


    public function buildpage()
    {
        $allSection=custom_section::all();
        $data['allSection']=$allSection;

        //$page_details=page_builderDetails::all();
        $page_details = page_builderDetails::select('page_name')->distinct()->get();
        $data['page_use']= $page_details;
        //$page_use=json_encode($page_details);
        return view('pages.admin-pageSection',$data);
    }

    //=========================================================    
    public function section()
    {
        return view('pages.admin-buildSection');
    }

    public function builtsection(Request $request)
    {   
                $allelement=$request->sectionName;
                $allelement=$request->elements;
                $allcheckbox=$request->noOFcheckBox;
                $allradiobtn=$request->noOFradioBtn;
                $allbtnurl=$request->btnurl;
                $allname=$request->name;
                $alllebel=$request->label;
                $elementsCombination=array();
                #print_r($request->sectionName);
                #print_r($allelement);
                #print_r($allname);
                #print_r($alllebel);
                #print_r($allcheckbox);
                //print_r($allbtnurl);
                //exit();
                $validator = Validator::make($request->all(),
                [
                    'sectionName' => 'required|string',
                    'elements' => 'required|string',
                    'name' => 'required', 'string','max:20',
                    'label' => 'required', 'string','max:20',
                    'noOFcheckBox' => 'integer','max:10',
                    'noOFradioBtn' => 'integer','max:10',
                    'btnurl' => 'string',
                ]);
                if ($validator) 
                    {
                        foreach( $allelement as $key=> $value){ 
                            $data =array( 
                                'elements' => $allelement[$key],
                                'noOFcheckBox' => $allcheckbox,
                                'noOFradioBtn' => $allradiobtn,
                                'btnurl' => $allbtnurl[$key],
                                'name' => $allname[$key],
                                'label' => $alllebel[$key]
                            );
                            $elementsCombination[]=$data;
                        };
                        $newSection = custom_section::create([ 
                            'elements' =>json_encode($elementsCombination),
                            'sections_name' => $request->sectionName,
                        ]);
                    }
                return view('pages.admin-buildSection', compact('elementsCombination'));
    }
//=========================================================    
}
