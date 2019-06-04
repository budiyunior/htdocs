package com.example.customshirt;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.customshirt.Model.ResponseLogin;
import com.example.customshirt.Model.User;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.pixplicity.easyprefs.library.Prefs;
import com.example.customshirt.Spref;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;



public class LoginActivity extends AppCompatActivity implements View.OnClickListener {


    private Button login;
    private EditText txt_username;
    private EditText txt_password;

    private Context mContext;

    //declate variable
    private User userData;
    private ProgressDialog pDialog;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        login = (Button) findViewById(R.id.btn_login);
        login.setOnClickListener(this);

        mContext=this;

    }


    public boolean validate_login(){
        return !validate.cek(txt_username) && !validate.cek(txt_password);
    }


    public void onClick(View view) {

        switch (view.getId()) {

            case R.id.btn_login:
                if (validate_login())
                    login();
                break;
        }
    }

    public void login(){
        pDialog = new ProgressDialog(this);
        //  pDialog.getProgressHelper().setBarColor(Color.parseColor("#A5DC86"));
        pDialog.setMessage("Loading");
        pDialog.setCancelable(false);
        // pDialog.setIndeterminate(false);
        pDialog.show();
        //Call<ResponseLogin> user=client.getApi().auth(et_username.getText().toString(),et_password.getText().toString());
        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
        user.enqueue(new Callback<ResponseLogin>() {
            @Override
            public void onResponse(Call<ResponseLogin> call, Response<ResponseLogin> response) {
                pDialog.hide();
                if (response.isSuccessful()){
                    if (response.body().getStatus()) {
                        userData = response.body().getData();

                        Log.d("data user", userData.toString());
                        setPreference(userData);
                        move.moveActivity(mContext, RegisterActivity.class);
                        finish();
                    }

                }
            }

            @Override
            public void onFailure(Call<ResponseLogin> call, Throwable t) {

            }


        });
    }
    private void setPreference(User us){
        Prefs.putInt(Spref.getId_pengguna(),us.getId_pengguna());
        Prefs.putString(Spref.getNama_pengguna(),us.getNama_pengguna());
        Prefs.putString(Spref.getId_akses(),us.getId_akses());
        Prefs.putString(Spref.getEmail(),us.getEmail());
        Prefs.putString(Spref.getNomor_telp(),us.getNomor_telp());
        Prefs.putString(Spref.getPassword(),us.getPassword().toString());
        Prefs.putString(Spref.getTanggal_lahir(),us.getTanggal_lahir());

    }
}
