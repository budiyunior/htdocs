package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
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

import java.util.UUID;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TestInputDesain extends AppCompatActivity implements View.OnClickListener {

    TextView txt_iddesain,txt_iditem, txt_nama_desain, txt_ukuran, txt_gambar, txt_berat_satuan, txt_harga_satuan;
    SharedPreferences sharedPreferences;


    private KeranjangFragment keranjangFragment;
    private Button btn_register;
    ApiInterface mApiInterface;
    private Spref spref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_test_input_desain);

        txt_iddesain = (TextView) findViewById(R.id.txt_iddesain);
        txt_iditem = (TextView) findViewById(R.id.txt_iditem);
        txt_nama_desain = (TextView) findViewById(R.id.txt_nama_desain);
        txt_ukuran = (TextView) findViewById(R.id.txt_ukuran);
        txt_gambar = (TextView) findViewById(R.id.txt_gambar);
        txt_berat_satuan = (TextView) findViewById(R.id.txt_berat_satuan);
        txt_harga_satuan = (TextView) findViewById(R.id.txt_harga_satuan);
        btn_register = (Button) findViewById(R.id.btn_register1);
        btn_register.setOnClickListener(this);

        mApiInterface = ApiClient.getClient().create(ApiInterface.class);


    }

    public void PostDesain() {
//        spref = new Spref(this);
//        String id_pengguna = spref.getSP_id_pengguna();
//        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String uniqueID = UUID.randomUUID().toString();
//
//        Call<PostPutDelDesainPengguna> postDesain = mApiInterface.postDesainPengguna( UUID.randomUUID().toString(),id_pengguna,
//                txt_iditem.getText().toString(), txt_nama_desain.getText().toString(),
//                txt_ukuran.getText().toString(), txt_gambar.getText().toString());
////                txt_berat_satuan.getText().toString(), txt_harga_satuan.getText().toString());
//        postDesain.enqueue(new Callback<PostPutDelDesainPengguna>() {
//            @Override
//            public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
//                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan" + txt_iditem, Toast.LENGTH_LONG).show();
//                Log.e("Berhasil", "berhasil");
//
////                finish();
//            }
//
//            @Override
//            public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
//                Toast.makeText(getApplicationContext(), "Gagal", Toast.LENGTH_LONG).show();
//            }
//        });
    }


    @Override
    public void onClick(View v) {
        if (v == btn_register) {
            PostDesain();
        }


    }


}
