package com.example.customshirt;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.customshirt.Adapter.KontakAdapter;
import com.example.customshirt.Adapter.MahasiswaAdapter;
import com.example.customshirt.Model.GetKontak;
import com.example.customshirt.Model.Kontak;
import com.example.customshirt.Model.mahasiswa.GetMahasiswa;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageListener;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Mahasiswa extends AppCompatActivity {

    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static Mahasiswa mha;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mahasiswa);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        mLayoutManager = new LinearLayoutManager(this);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        mha=this;
        refresh();
    }
    public void refresh() {
        Call<GetMahasiswa> MahasiswaCall = mApiInterface.getMahasiswa();
        MahasiswaCall.enqueue(new Callback<GetMahasiswa>() {
            @Override
            public void onResponse(Call<GetMahasiswa> call, Response<GetMahasiswa>
                    response) {
                List<com.example.customshirt.Model.mahasiswa.Mahasiswa> MahasiswaList = response.body().getListDataMahasiswa();
                Log.d("Retrofit Get", "Jumlah data Mahasiswa: " +
                        String.valueOf(MahasiswaList.size()));
                mAdapter = new MahasiswaAdapter(MahasiswaList);
                mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<GetMahasiswa> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }
}
