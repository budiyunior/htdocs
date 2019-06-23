package com.example.customshirt;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.customshirt.Adapter.ItemAdapter;
import com.example.customshirt.Adapter.KeranjangAdapter;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Model.Keranjang.GetKeranjang;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


/**
 * A simple {@link Fragment} subclass.
 */
public class KeranjangFragment extends Fragment {


    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;

    public KeranjangFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getActivity().setTitle("Keranjang");

        ((AppCompatActivity) getActivity()).getSupportActionBar().show();
        View myFragmentView  = inflater.inflate(R.layout.fragment_keranjang, container, false);

        mRecyclerView = (RecyclerView) myFragmentView.findViewById(R.id.recyclerKeranjang);
        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
//        refresh();

        return myFragmentView;
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

//    }

}
