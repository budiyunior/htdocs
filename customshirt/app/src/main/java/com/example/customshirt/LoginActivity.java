package com.example.customshirt;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.example.customshirt.Model.User.ResponseLogin;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import customfonts.MyEditText;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class LoginActivity extends AppCompatActivity implements View.OnClickListener {

    SharedPreferences sharedPreferences;
    private Button btn_login;
    private Button btn_register;
    private Button btn_nologin;
    private Button btn_desain;

    private MyEditText txt_username;
    private MyEditText txt_password;
    ApiInterface mApiInterface;
    Context mContext;

    Spref spref;
    //declate variable

    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        btn_login = (Button) findViewById(R.id.btn_login);
        btn_login.setOnClickListener(this);
        btn_nologin = (Button) findViewById(R.id.btn_nologin);
        btn_nologin.setOnClickListener(this);
        btn_register = (Button) findViewById(R.id.btn_register);
        btn_register.setOnClickListener(this);
        btn_desain = (Button) findViewById(R.id.btn_desain);
        btn_desain.setOnClickListener(this);
        txt_username = (MyEditText) findViewById(R.id.txt_username);
        txt_password = (MyEditText) findViewById(R.id.txt_password);
//        mContext = this;

        spref = new Spref(LoginActivity.this);

//        if (spref.getSP_Sukses_Login()){
//            startActivity(new Intent(LoginActivity.this, ButtonNav.class)
//                    .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
//            finish();
//        }
//
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

            Call<ResponseLogin> user = mApiInterface.login(txt_username.getText().toString(),txt_password.getText().toString());
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
            user.enqueue(new Callback<ResponseLogin>() {
                @Override
                public void onResponse(Call<ResponseLogin> call, Response<ResponseLogin> response) {
                    pDialog.dismiss();
                    String id_pengguna = response.body().getId_pengguna();
                    String email = response.body().getEmail();
                    String nama_pengguna = response.body().getNama_pengguna();
                    String id_akses = response.body().getId_akses();
                    String tanggal_lahir = response.body().getTanggal_lahir();
                    String nomor_telp = response.body().getNomor_telp();
                    String password = response.body().getPassword();

                    if (TextUtils.isEmpty(id_pengguna)) {
                        Toast.makeText(LoginActivity.this, "Username atau Password Salah", Toast.LENGTH_SHORT).show();
                    } else {
                        Toast.makeText(LoginActivity.this, "Berhasil  Login", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(LoginActivity.this, ButtonNav.class);
                        SharedPreferences.Editor editor = sharedPreferences.edit();
                        editor.putString("id_pengguna", id_pengguna);
                        editor.putString("nama_pengguna", nama_pengguna);
                        editor.putString("email", email);
                        editor.putString("tanggal_lahir", tanggal_lahir);
                        editor.putString("id_akses", id_akses);
                        editor.putString("nomor_telp", nomor_telp);
                        editor.putString("password", password);
                        editor.apply();
                        startActivity(intent);
                        Log.e("Berhasil", "berhasil"+id_pengguna+nama_pengguna+email+tanggal_lahir+id_akses+nomor_telp+password);

                        spref.saveSPString(spref.SP_id_pengguna, id_pengguna);
                        spref.saveSPString(spref.SP_nama_pengguna, nama_pengguna);
                        spref.saveSPString(spref.SP_email, email);
                        spref.saveSPString(spref.SP_tanggal_lahir, tanggal_lahir);
                        spref.saveSPString(spref.SP_id_akses, id_akses);
                        spref.saveSPString(spref.SP_nomor_telp, nomor_telp);
                        spref.saveSPBoolean(spref.SP_Sukses_Login, true);

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
            Intent intent = new Intent(LoginActivity.this, RegisterActivity.class);
            startActivity(intent);

        }
        if (v == btn_nologin) {
            Intent intent = new Intent(LoginActivity.this, ButtonNav.class);
            startActivity(intent);

        }
        if (v == btn_desain) {

            spref.saveSPBoolean(spref.SP_Sukses_Login, false);
            startActivity(new Intent(LoginActivity.this, ButtonNav.class)
                    .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
            finish();
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
