package com.example.customshirt;

import android.content.Context;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class ProfileActivity extends AppCompatActivity {

    SharedPreferences sharedPreferences;
    TextView txt_profile, txt_email,txt_nama,txt_tgl_lahir,txt_nomor_telp,txt_password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);

//        String id_pengguna=sharedPreferences.getString("id_pengguna","0");
//        txt_profile= findViewById(R.id.txt_profile);
//        txt_profile.setText(id_pengguna);

        String email=sharedPreferences.getString("email","1");
        txt_email= findViewById(R.id.txt_email);
        txt_email.setText(email);

        String nama_pengguna=sharedPreferences.getString("nama_pengguna","2");
        txt_nama= findViewById(R.id.txt_nama);
        txt_nama.setText(nama_pengguna);

//        String tanggal_lahir=sharedPreferences.getString("tangal_lahir","3");
//        txt_tgl_lahir= findViewById(R.id.txt_tgl_lahir);
//        txt_tgl_lahir.setText(tanggal_lahir);
//
//        String nomor_telp=sharedPreferences.getString("nomor_telp","4");
//        txt_nomor_telp= findViewById(R.id.txt_nomor_telp);
//        txt_nomor_telp.setText(nomor_telp);

        String password=sharedPreferences.getString("password","5");
        txt_password= findViewById(R.id.txt_password);
        txt_password.setText(password);


    }
}
