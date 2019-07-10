package com.example.customshirt;

import android.content.Context;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.widget.TextView;

import com.example.customshirt.Adapter.AlamatPenggunaAdapter;
import com.example.customshirt.Adapter.ItemAdapter;
import com.example.customshirt.Model.AlamatPengguna.AlamatPengguna;
import com.example.customshirt.Model.AlamatPengguna.GetAlamatPengguna;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AlamatActivity extends AppCompatActivity {

    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    ApiInterface mApiInterface;
//    SharedPreferences sharedPreferences;
TextView txt_nama;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_alamat);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerAlamat);
        mLayoutManager = new LinearLayoutManager(this);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        refresh();

        SharedPreferences sharedPreferences = this.getSharedPreferences("remember", Context.MODE_PRIVATE);
        String nama_pengguna=sharedPreferences.getString("id_pengguna","2");
        txt_nama= findViewById(R.id.txt_nama);
        txt_nama.setText(nama_pengguna);
        Log.e("Berhasil", "berhasil" + nama_pengguna);
    }

    public void refresh() {
        SharedPreferences sharedPreferences = this.getSharedPreferences("remember", Context.MODE_PRIVATE);
        String nama_pengguna=sharedPreferences.getString("id_pengguna","2");
        txt_nama= findViewById(R.id.txt_nama);
        txt_nama.setText(nama_pengguna);
        final String id_pengguna = sharedPreferences.getString("id_pengguna", "0");
        Call<GetAlamatPengguna> ItemCall = mApiInterface.getAlamatPengguna(nama_pengguna);
        ItemCall.enqueue(new Callback<GetAlamatPengguna>() {
            @Override
            public void onResponse(Call<GetAlamatPengguna> call, Response<GetAlamatPengguna>
                    response) {
                List<AlamatPengguna> alamatPenggunaList = response.body().getListDataAlamatPengguna();
                Log.d("Retrofit Get", "Jumlah data Item: " + String.valueOf(alamatPenggunaList.size()));
                mAdapter = new AlamatPenggunaAdapter(alamatPenggunaList);
                mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<GetAlamatPengguna> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }
}
