package com.example.dec2017.generate_otp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Random;

public class OTPActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_otp);
    }

    public char[] Calculare_Otp()
    {

        String numbers = "0123456789";
        String letters="ABCDEFGHIJKLMNOPQRSTUWXYZ";
        String otp= letters+numbers;
        Random r = new Random();
        char [] s= new char[8];
        for ( int i=0; i< 8; i++)
        {
            s[i]=otp.charAt(r.nextInt(otp.length()));
        }

        return s;
    }



    public void Generate(View view) {

        final TextView tvOTP = (TextView) findViewById(R.id.tvOTP);
        String password = String.valueOf(Calculare_Otp());
        tvOTP.setText(password);
        final String otp = tvOTP.getText().toString();

        Response.Listener<String> responseListener = new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonResponse = new JSONObject(response);
                    boolean success = jsonResponse.getBoolean("success");

                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        };

        OTPRequest otpRequest = new OTPRequest(otp,responseListener);
        RequestQueue queue = Volley.newRequestQueue(OTPActivity.this);
        queue.add(otpRequest);
    }
}
