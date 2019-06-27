package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.DeadObjectException;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.cepheuen.elegantnumberbutton.view.ElegantNumberButton;
import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.DetailKeranjang.PostDetailCart;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.UUID;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DetailItem extends AppCompatActivity implements View.OnClickListener {

    TextView tvNama, tvHarga, tvDeskripsi;
    SharedPreferences sharedPreferences;
    ElegantNumberButton jumlah_item;


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

        jumlah_item = (ElegantNumberButton) findViewById(R.id.jumlah_item);

        Intent mIntent = getIntent();

        Bundle bd = mIntent.getExtras();

        tvNama.setText( mIntent.getStringExtra("Nama"));
        tvHarga.setText( mIntent.getStringExtra("Harga"));
//        tvDeskripsi.setText(mIntent.getStringExtra("Deskripsi"));
//        String id_item = (String) bd.get("Id_item");
        if(bd != null)
        {
            String id_item = (String) bd.get("Id_item");
            String getName = (String) bd.get("Nama");
            Log.e("Berhasil", "berhasil"+id_item+getName);
//            txtView.setText(getName);
            String harga_satuan = (String) bd.get("Harga");
            String berat_satuan = (String) bd.get("Berat");
            Log.e("Berhasil", "berhasil"+harga_satuan+berat_satuan);
        }
//        String id_item = (String) bd.get("Id_item");


        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

//        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_pengguna =sharedPreferences.getString("id_pengguna","0");
//        String nama_pengguna=sharedPreferences.getString("nama_pengguna","2");

//        spref = new Spref(this);
//
//        String id_pengguna = spref.getSP_id_pengguna();

        btn_masukcart = (Button) findViewById(R.id.btn_masukcart);
        btn_masukcart.setOnClickListener(this);
        String uniqueID = UUID.randomUUID().toString();


    }

    public void PostDesain() {
        spref = new Spref(this);
        String id_pengguna = spref.getSP_id_pengguna();
        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_desain = ;
        String id_detail_cart = UUID.randomUUID().toString();
        Intent mIntent = getIntent();
        Bundle bd = mIntent.getExtras();
        String id_item = (String) bd.get("Id_item");
        String harga_satuan = (String) bd.get("Harga");
        String berat_satuan = (String) bd.get("Berat");
        Double harga_satuan2 = Double.parseDouble(harga_satuan);
        Double berat_satuan2 = Double.parseDouble(berat_satuan);
        String tvHargaOld = jumlah_item.getNumber();
        Double tvHargaNew = Double.parseDouble(tvHargaOld);
        String tvHargaOld2 = jumlah_item.getNumber();
        Double tvHargaNew2 = Double.parseDouble(tvHargaOld2);
        final Double subHarga = harga_satuan2 * tvHargaNew2;
        final Double subBerat = berat_satuan2 * tvHargaNew;
        Log.e("Berhasil", "berhasil"+harga_satuan+berat_satuan);
        Call<PostPutDelDesainPengguna> postDesain = mApiInterface.postDesainPengguna(UUID.randomUUID().toString(),id_pengguna,null,
                id_item,tvNama.getText().toString(), null,null,jumlah_item.getNumber(),subBerat.toString()
                ,subHarga.toString());
        postDesain.enqueue(new Callback<PostPutDelDesainPengguna>() {
            @Override
            public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
                Log.e("Berhasil", "berhasil"+subBerat+subHarga+jumlah_item.getNumber());
//                finish();
            }

            @Override
            public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
                Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
            }
        });

    }





    @Override
    public void onClick(View v) {
        if (v == btn_masukcart){
           PostDesain();
        }


    }


}
