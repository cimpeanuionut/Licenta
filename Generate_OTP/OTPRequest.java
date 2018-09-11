package com.example.dec2017.generate_otp;

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class OTPRequest extends StringRequest {

    private static final  String REQUEST_OTP_URL = "https://cimpeanualex.000webhostapp.com/GenerateOTP.php";
    private Map<String, String> params;
    public OTPRequest(String otp, Response.Listener<String> listener)
    {
        super (Method.POST,REQUEST_OTP_URL,listener,null);
        params = new HashMap<>();
        params.put("otp", otp);

    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }


}
