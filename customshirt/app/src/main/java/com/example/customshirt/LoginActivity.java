package com.example.customshirt;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.design.widget.TextInputEditText;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
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

import customfonts.MyEditText;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class LoginActivity extends AppCompatActivity implements View.OnClickListener {

    SharedPreferences sharedPreferences;
    private Button btn_login;
    private Button btn_register;

    private MyEditText txt_username;
    private MyEditText txt_password;
    ApiInterface mApiInterface;
    private Context mContext;

    //declate variable
    private User userData;
    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        btn_login = (Button) findViewById(R.id.btn_login);
        btn_login.setOnClickListener(this);
        btn_register = (Button) findViewById(R.id.btn_register);
        btn_register.setOnClickListener(this);
        txt_username = (MyEditText) findViewById(R.id.txt_username);
        txt_password = (MyEditText) findViewById(R.id.txt_password);
        mContext = this;

        sharedPreferences = LoginActivity.this.getSharedPreferences("remember", Context.MODE_PRIVATE);
        String id = sharedPreferences.getString("id", "0");
    }


//    public boolean validate_login() {
//        return !validate.cek(txt_username) && !validate.cek(txt_password);
//    }


    public void onClick(View v) {
        if (v == btn_login) {
            pDialog = new ProgressDialog(this);
            //  pDialog.getProgressHelper().setBarColor(Color.parseColor("#A5DC86"));
            pDialog.setMessage("Loading");
            pDialog.setCancelable(false);
            // pDialog.setIndeterminate(false);
            pDialog.show();
            Call<ResponseLogin> user = mApiInterface.login(txt_username.getText().toString(), txt_password.getText().toString());
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
            user.enqueue(new Callback<ResponseLogin>() {
                @Override
                public void onResponse(Call<ResponseLogin> call, Response<ResponseLogin> response) {
                    pDialog.dismiss();
                    String id = response.body().getId_pengguna();
                    String email = response.body().getEmail();
                    if (TextUtils.isEmpty(id)) {
                        Toast.makeText(LoginActivity.this, "Email atau Password Salah", Toast.LENGTH_SHORT).show();
                    } else {
                        Toast.makeText(LoginActivity.this, "Login Sukses", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(LoginActivity.this, ButtonNav.class);

                        SharedPreferences.Editor editor = sharedPreferences.edit();
                        editor.putString("id", id);
                        editor.putString("email", email);
                        editor.apply();
                        startActivity(intent);
                        Log.e("Berhasil", "berhasil" + id + email);
                    }
                }

                @Override
                public void onFailure(Call<ResponseLogin> call, Throwable t) {
                    pDialog.dismiss();
                    Log.e("gagal", "gagal" + t);
                    Toast.makeText(LoginActivity.this, "Koneksi Gagal", Toast.LENGTH_LONG).show();
                }
            });
        }
        if (v == btn_register) {
            Intent intent = new Intent(LoginActivity.this, ButtonNav.class);
            startActivity(intent);

        }
    }

//    private void setPreference(User us) {
//        Prefs.putInt(Spref.getId_pengguna(), us.getId_pengguna());
//        Prefs.putString(Spref.getNama_pengguna(), us.getNama_pengguna());
//        Prefs.putString(Spref.getId_akses(), us.getId_akses());
//        Prefs.putString(Spref.getEmail(), us.getEmail());
//        Prefs.putString(Spref.getNomor_telp(), us.getNomor_telp());
//        Prefs.putString(Spref.getPassword(), us.getPassword().toString());
//        Prefs.putString(Spref.getTanggal_lahir(), us.getTanggal_lahir());
//
//    }
}
