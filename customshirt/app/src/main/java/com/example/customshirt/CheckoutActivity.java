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
import android.widget.Toast;

import com.example.customshirt.Adapter.KeranjangAdapter;
import com.example.customshirt.Model.Keranjang.GetShowCart;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

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
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_checkout);

//        btn_checkout = (Button) findViewById(R.id.btn_checkout);
//        btn_checkout.setOnClickListener(this);

        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
        String id_pengguna = sharedPreferences.getString("id_pengguna","0");
        Log.e("Berhasil", "berhasil"+id_pengguna);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerKeranjang);
        mLayoutManager = new LinearLayoutManager(CheckoutActivity.this);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

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
                mAdapter = new KeranjangAdapter(keranjangList);
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
    public void onClick(View v) {

    }


}
