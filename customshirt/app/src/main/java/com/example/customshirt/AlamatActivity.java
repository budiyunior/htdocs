package com.example.customshirt;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.ProgressDialog;
import android.content.Context;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.RecyclerView;
import android.text.Editable;
import android.text.InputFilter;
import android.text.TextWatcher;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.example.customshirt.Adapter.CityAdapter;
import com.example.customshirt.Adapter.ProvinceAdapter;
import com.example.customshirt.Rest.ApiInterface;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Model.city.ItemCity;
import com.example.customshirt.Model.province.ItemProvince;
import com.example.customshirt.Model.province.Result;
import com.google.gson.Gson;

import java.util.ArrayList;
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
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class AlamatActivity extends AppCompatActivity {

    private Button btn_newalamat;


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

        btn_newalamat = (Button) findViewById(R.id.btn_newalamat);

        btn_newalamat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent EditAlamatActivity = new Intent(AlamatActivity.this, EditAlamatActivity.class);
                startActivity(EditAlamatActivity);
            }
        });
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
