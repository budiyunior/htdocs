package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.customshirt.Adapter.CheckoutAdapter;
import com.example.customshirt.Adapter.KeranjangAdapter;
import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.Keranjang.GetShowCart;
import com.example.customshirt.Model.Keranjang.GetTotalHarga;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.Model.Transaksi.PostTransaksi;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;
import java.util.UUID;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CheckoutActivity extends AppCompatActivity implements View.OnClickListener {
//    private Button btn_checkout;
    SharedPreferences sharedPreferences;
    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    TextView tvtotal_harga;
    private Spref spref;
    private Button btn_checkout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_checkout);

//        btn_checkout = (Button) findViewById(R.id.btn_checkout);
//        btn_checkout.setOnClickListener(this);
        btn_checkout = (Button) findViewById(R.id.btn_checkout);
        btn_checkout.setOnClickListener(this);

        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
        final String id_pengguna = sharedPreferences.getString("id_pengguna","0");
        Log.e("Berhasil", "berhasil"+id_pengguna);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerCheckout);
        mLayoutManager = new LinearLayoutManager(CheckoutActivity.this);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        String total_harga=sharedPreferences.getString("total_harga","10");
        tvtotal_harga= findViewById(R.id.total_harga);
//        tvtotal_harga.setText(total_harga);
        showcart();

    }


    public  void showcart(){
        final String id_pengguna=sharedPreferences.getString("id_pengguna","0");
        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
        Call<GetShowCart> user = mApiInterface.showcart(id_pengguna) ;
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
        user.enqueue(new Callback<GetShowCart>() {
            @Override
            public void onResponse(Call<GetShowCart> call, Response<GetShowCart> response) {
//                String id_pengguna = response.body().getId_pengguna();
                List<Keranjang> keranjangList = response.body().getListDataKeranjang();
                Log.d("Retrofit Get", "Jumlah data Keranjang:"+String.valueOf(keranjangList.size()));
                mAdapter = new CheckoutAdapter(keranjangList);
                mRecyclerView.setAdapter(mAdapter);
                Log.e("Berhasil", "berhasil"+id_pengguna);
            }

            @Override
            public void onFailure(Call<GetShowCart> call, Throwable t) {
                Log.e("gagal", "gagal" + t);
                Toast.makeText(CheckoutActivity.this, "Koneksi Gagal", Toast.LENGTH_LONG).show();
            }

        });


    }
    public  void total_harga(){
        final String id_pengguna=sharedPreferences.getString("id_pengguna","0");
        sharedPreferences = this.getSharedPreferences("remember", Context.MODE_PRIVATE);
        Call<GetTotalHarga> user = mApiInterface.total_harga(id_pengguna) ;
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
        user.enqueue(new Callback<GetTotalHarga>() {
            @Override
            public void onResponse(Call<GetTotalHarga> call, Response<GetTotalHarga> response) {
//                String id_pengguna = response.body().getId_pengguna();
                String total_harga = response.body().getTotal_harga();
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putString("total_harga", total_harga);
                editor.apply();
                Log.e("Berhasil", "berhasil"+id_pengguna+total_harga);
            }

            @Override
            public void onFailure(Call<GetTotalHarga> call, Throwable t) {
                Log.e("gagal", "gagal" + t);
                Toast.makeText(CheckoutActivity.this, "Koneksi Gagal", Toast.LENGTH_LONG).show();
            }

        });

    }

    public void PostTransaksi() {
        spref = new Spref(this);
        final String id_pengguna = spref.getSP_id_pengguna();
        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_desain = ;
        String date = new SimpleDateFormat("yyyy-MM-dd", Locale.getDefault()).format(new Date());
        final String id_transaksi= String.valueOf(((new Date().getTime() / 1000L) % Integer.MAX_VALUE));
        Call<PostTransaksi> postTrans = mApiInterface.postTransaksi(id_transaksi,id_pengguna,date,
                null,null, null,"1","maked");
        postTrans.enqueue(new Callback<PostTransaksi>() {
            @Override
            public void onResponse(Call<PostTransaksi> call, Response<PostTransaksi> response) {
                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
                Log.e("Berhasil", "berhasil");
                Log.e("Berhasil", "berhasil"+id_transaksi+id_pengguna);
//                finish();
            }
            @Override
            public void onFailure(Call<PostTransaksi> call, Throwable t) {
                Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
            }
        });

    }
    public void onClick(View v) {
            if (v == btn_checkout) {
                PostTransaksi();

            }

    }


}
