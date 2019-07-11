package com.example.customshirt;


import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.text.TextUtils;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.customshirt.Adapter.ItemAdapter;
import com.example.customshirt.Adapter.KeranjangAdapter;
import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Model.Keranjang.GetKeranjang;
import com.example.customshirt.Model.Keranjang.GetShowCart;
import com.example.customshirt.Model.Keranjang.GetTotalHarga;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.Model.Keranjang.PostPutDelKeranjang;
import com.example.customshirt.Model.User.ResponseLogin;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


/**
 * A simple {@link Fragment} subclass.
 */
public class KeranjangFragment extends Fragment implements View.OnClickListener {

    private Button btn_checkout,btn_hapus;
    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    SharedPreferences sharedPreferences;
    TextView tvtotal_harga,tvnama_item;

    public static KeranjangFragment kf;

    public KeranjangFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getActivity().setTitle("Keranjang");

        ((AppCompatActivity) getActivity()).getSupportActionBar().show();
        final View myFragmentView = inflater.inflate(R.layout.fragment_keranjang, container, false);
kf=this;
        btn_checkout = (Button) myFragmentView.findViewById(R.id.btn_checkout);
        btn_checkout.setOnClickListener(this);
//
tvnama_item = (TextView) myFragmentView.findViewById(R.id.txt_nama_desain);
        sharedPreferences = this.getActivity().getSharedPreferences("remember", Context.MODE_PRIVATE);
        final String id_pengguna = sharedPreferences.getString("id_pengguna", "0");

        Log.e("Berhasil", "berhasil" + id_pengguna);

        mRecyclerView = (RecyclerView) myFragmentView.findViewById(R.id.recyclerKeranjang);
        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
//        refresh();
        showcart();
        total_harga();

//        String total_harga = sharedPreferences.getString("total_harga", "10");
        tvtotal_harga = myFragmentView.findViewById(R.id.total_harga);
        btn_checkout = (Button) myFragmentView.findViewById(R.id.btn_checkout);
        btn_checkout.setOnClickListener(this);

//        final String id_pengguna = sharedPreferences.getString("id_pengguna", "0");
        sharedPreferences = this.getActivity().getSharedPreferences("remember", Context.MODE_PRIVATE);
//        Call<GetTotalHarga> user = mApiInterface.total_harga(id_pengguna);
////        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
//        user.enqueue(new Callback<GetTotalHarga>() {
//            @Override
//            public void onResponse(Call<GetTotalHarga> call, Response<GetTotalHarga> response) {
////                String id_pengguna = response.body().getId_pengguna();
//                String total_harga = response.body().getTotal_harga();
//                tvtotal_harga = myFragmentView.findViewById(R.id.total_harga);
//                Log.e("Berhasil", "berhasil" + id_pengguna + total_harga);
//            }
//
//            @Override
//            public void onFailure(Call<GetTotalHarga> call, Throwable t) {
//                Log.e("gagal", "gagal" + t);
//                Toast.makeText(getActivity(), "Koneksi Gagal", Toast.LENGTH_LONG).show();
//            }
//        });


        return myFragmentView;
    }

    public void showcart() {
        final String id_pengguna = sharedPreferences.getString("id_pengguna", "0");
        sharedPreferences = this.getActivity().getSharedPreferences("remember", Context.MODE_PRIVATE);
        Call<GetShowCart> user = mApiInterface.showcart(id_pengguna);
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
        user.enqueue(new Callback<GetShowCart>() {
            @Override
            public void onResponse(Call<GetShowCart> call, Response<GetShowCart> response) {
//                String id_pengguna = response.body().getId_pengguna();

                List<Keranjang> keranjangList = response.body().getListDataKeranjang();
                Log.d("Retrofit Get", "Jumlah data Keranjang:" + String.valueOf(keranjangList.size()));
                mAdapter = new KeranjangAdapter(keranjangList,getContext());
                mRecyclerView.setAdapter(mAdapter);
                Log.e("Berhasil", "berhasil" + id_pengguna);
            }

            @Override
            public void onFailure(Call<GetShowCart> call, Throwable t) {
                Log.e("gagal", "gagal" + t);
                Toast.makeText(getActivity(), "Koneksi Gagal", Toast.LENGTH_LONG).show();
            }

        });


    }

    public void total_harga() {
//        final String id_pengguna = sharedPreferences.getString("id_pengguna", "0");
//        sharedPreferences = this.getActivity().getSharedPreferences("remember", Context.MODE_PRIVATE);
//        Call<GetTotalHarga> user = mApiInterface.total_harga(id_pengguna);
////        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
//        user.enqueue(new Callback<GetTotalHarga>() {
//            @Override
//            public void onResponse(Call<GetTotalHarga> call, Response<GetTotalHarga> response) {
////                String id_pengguna = response.body().getId_pengguna();
//                String total_harga = response.body().getTotal_harga();
//                tvtotal_harga = myFragmentView.findViewById(R.id.total_harga);
//                Log.e("Berhasil", "berhasil" + id_pengguna + total_harga);
//            }
//
//            @Override
//            public void onFailure(Call<GetTotalHarga> call, Throwable t) {
//                Log.e("gagal", "gagal" + t);
//                Toast.makeText(getActivity(), "Koneksi Gagal", Toast.LENGTH_LONG).show();
//            }
//
//        });


    }
 public void hapusdesain() {

                Call<PostPutDelDesainPengguna> deleteKontak = mApiInterface.deleteDesainPengguna(tvnama_item.getText().toString());
                deleteKontak.enqueue(new Callback<PostPutDelDesainPengguna>() {
                    @Override
                    public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
                    }
                    @Override
                    public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
                        Toast.makeText(getActivity(), "Error", Toast.LENGTH_LONG).show();
                    }
                });

        }


    public void onClick(View v) {
        if (v == btn_checkout) {
            Intent intent = new Intent(getActivity(), PilihAlamatActivity.class);
            startActivity(intent);
        }
//        if (v == btn_hapus) {
////            hapusdesain();
//        }
    }

//    public void refresh() {
//        Call<GetKeranjang> KeranjangCall = mApiInterface.getKeranjang();
//        KeranjangCall.enqueue(new Callback<GetKeranjang>() {
//            @Override
//            public void onResponse(Call<GetKeranjang> call, Response<GetKeranjang>
//                    response) {
//                List<Keranjang> keranjangList = response.body().getListDataKeranjang();
//                Log.d("Retrofit Get", "Jumlah data Keranjang: " +
//                        String.valueOf(keranjangList.size()));
//                mAdapter = new KeranjangAdapter(keranjangList);
//                mRecyclerView.setAdapter(mAdapter);
//            }
//
//            @Override
//            public void onFailure(Call<GetKeranjang> call, Throwable t) {
//                Log.e("Retrofit Get", t.toString());
//            }
//        });
//
//    }

}
