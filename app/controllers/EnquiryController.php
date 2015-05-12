<?php
class EnquiryController extends Controller {
    
    public function getContactForm() {
        $data = Input::all();
        //print_r($data);exit;
        $rules = array(
            'name' => 'required|alpha',
            'mobile' => 'required|min:10'
        );
        
        $validator = Validator::make ($data, $rules);
        if ($validator->passes()) {
            $enquiry = new Enquiry;
            $enquiry->name = $data['name'];
            $enquiry->mobile = $data['mobile'];
            $enquiry->email = $data['email'];
            $enquiry->message = $data['message'];
            $enquiry->save();
             //Send email using Laravel send function
            Mail::send('home.partials.thankyou', $data, function($message) use ($data)
            {
                $message->from($data['email'] , $data['name']);
                $message->to('abc@gmail.com', 'my name')->subject('contact request');
            });
            return Redirect:: to('contact-us')->with('success', 'Thank you for making Enquiry');
        }
        else{
            return Redirect:: to('contact-us')->with('success', 'Please Enter Valid Details');
        }
    }
}
?>