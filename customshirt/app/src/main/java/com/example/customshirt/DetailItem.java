package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DetailItem extends AppCompatActivity implements View.OnClickListener {

    TextView tvNama, tvHarga, tvDeskripsi;
    SharedPreferences sharedPreferences;


    private KeranjangFragment keranjangFragment;
    private Button btn_masukcart;
    ApiInterface mApiInterface;
    private Spref spref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_item);

        tvNama = findViewById(R.id.tvNama);
        tvHarga = findViewById(R.id.tvHarga);
        tvDeskripsi = findViewById(R.id.tvDeskripsi);

        Intent mIntent = getIntent();

        tvNama.setText(mIntent.getStringExtra("Nama"));
        tvHarga.setText(mIntent.getStringExtra("Harga"));
        tvDeskripsi.setText(mIntent.getStringExtra("Deskripsi"));


        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

//        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_pengguna =sharedPreferences.getString("id_pengguna","0");
//        String nama_pengguna=sharedPreferences.getString("nama_pengguna","2");

//        spref = new Spref(this);
//
//        String id_pengguna = spref.getSP_id_pengguna();

        btn_masukcart = (Button) findViewById(R.id.btn_masukcart);
        btn_masukcart.setOnClickListener(this);

    }

    public void PostDesain() {
//        spref = new Spref(this);
//        final String id_pengguna = spref.getSP_id_pengguna();
//        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_pengguna =sharedPreferences.getString("id_pengguna","0");
//        String nama_pengguna=sharedPreferences.getString("nama_pengguna","2");
//        Call<PostPutDelDesainPengguna> postDesainPengguna = mApiInterface.postDesainPengguna(tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString());
//        postDesainPengguna.enqueue(new Callback<PostPutDelDesainPengguna>() {
//            @Override
//            public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
//                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
//                Log.e("Berhasil", "berhasil");
//
////                finish();
//            }
//
//            @Override
//            public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
//                Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
//            }
//        });
    }


    @Override
    public void onClick(View v) {
        if (v == btn_masukcart){
            Call<PostPutDelDesainPengguna> postDesainPengguna = mApiInterface.postDesainPengguna(tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString(),tvHarga.getText().toString());
            postDesainPengguna.enqueue(new Callback<PostPutDelDesainPengguna>() {
                @Override
                public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
                    Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
                    Log.e("Berhasil", "berhasil");

//                finish();
                }

                @Override
                public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
                    Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                }
            });
        }


    }


}
