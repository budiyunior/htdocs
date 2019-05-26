package com.example.customshirt;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;


import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;

import com.example.customshirt.Adapter.MahasiswaAdapter;

import com.example.customshirt.Model.mahasiswa.GetMahasiswa;
import com.example.customshirt.Model.mahasiswa.Mahasiswa;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;


import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MahasiswaActivity extends AppCompatActivity {

    ApiInterface mApiInterface;
    private RecyclerView mRecyclerViewMhs;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static MahasiswaActivity mha;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mahasiswa);

        mRecyclerViewMhs = (RecyclerView) findViewById(R.id.recyclerViewMhs);
        mLayoutManager = new LinearLayoutManager(this);
        mRecyclerViewMhs.setLayoutManager(mLayoutManager);
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
                List<Mahasiswa> MahasiswaList = response.body().getListDataMahasiswa();
                Log.d("Retrofit Get", "Jumlah data Mahasiswa: " +
                        String.valueOf(MahasiswaList.size()));
                mAdapter = new MahasiswaAdapter(MahasiswaList);
                mRecyclerViewMhs.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<GetMahasiswa> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }
}
