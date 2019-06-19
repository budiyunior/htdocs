package com.example.customshirt;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.customshirt.Model.PostPutDelUser;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import retrofit2.Call;

public class RegisterActivity extends AppCompatActivity implements View.OnClickListener {

    EditText txt_email, txt_username, txt_nohp, txt_password;
    Button btn_register, btn_login;
    ApiInterface mApiInterface;
    private static RegisterActivity ra;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        txt_email = (EditText) findViewById(R.id.txt_email);
        txt_username = (EditText) findViewById(R.id.txt_username);
        txt_nohp = (EditText) findViewById(R.id.txt_nohp);
        txt_password = (EditText) findViewById(R.id.txt_password);
        btn_login = (Button) findViewById(R.id.btn_login);
        btn_login.setOnClickListener(this);
        btn_register = (Button) findViewById(R.id.btn_register);
        btn_register.setOnClickListener(this);
        ra = this;
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

    }

    @Override
    public void onClick(View v) {
//        if (v == btn_register) {
//            Call<PostPutDelUser> postUserCall = mApiInterface.postUser(txt_username.getText().toString(),
//                    txt_email.getText().toString(), txt_nohp.getText().toString(),txt_password.getText().toString());
//            postUserCall.enqueue(new Callback<PostPutDelUser>() {
//                @Override
//                public void onResponse(Call<PostPutDelKontak> call, Response<PostPutDelKontak> response) {
//                    MainActivity.ma.refresh();
//                    finish();
//                }
//
//                @Override
//                public void onFailure(Call<PostPutDelKontak> call, Throwable t) {
//                    Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
//                }
//            });
//        }
        if (v == btn_login) {
            Intent intent = new Intent(RegisterActivity.this, ButtonNav.class);
            startActivity(intent);
        }
    }
}
