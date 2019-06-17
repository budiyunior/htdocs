package com.example.customshirt;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;

import com.example.customshirt.Adapter.ItemAdapter;
import com.example.customshirt.Model.GetItem;
import com.example.customshirt.Model.Item;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageListener;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


/**
 * A simple {@link Fragment} subclass.
 */
public class HomeFragment extends Fragment implements View.OnClickListener {

    private Button filterjenisbaju;
    private Button filterjeniskain;
    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static HomeFragment hf;

    CarouselView carouselView;

    int[] sampleImages = {R.drawable.image_1, R.drawable.image_2, R.drawable.image_3};

    public HomeFragment() {
        // Required empty public constructor
    }



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getActivity().setTitle("Beranda");

        ((AppCompatActivity) getActivity()).getSupportActionBar().show();
       View myFragmentView = inflater.inflate(R.layout.fragment_home, container, false);

        hf=this;
        filterjenisbaju = (Button) myFragmentView.findViewById(R.id.filterjenisbaju);
        filterjenisbaju.setOnClickListener(this);
        filterjeniskain = (Button) myFragmentView.findViewById(R.id.filterjeniskain);
        filterjeniskain.setOnClickListener(this);

        mRecyclerView = (RecyclerView) myFragmentView.findViewById(R.id.recyclerView);
        mLayoutManager = new GridLayoutManager(getActivity(),2);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

        refresh();





        carouselView = (CarouselView) myFragmentView.findViewById(R.id.carouselView);
        carouselView.setPageCount(sampleImages.length);

        carouselView.setImageListener(imageListener);


        return myFragmentView;
    }
    ImageListener imageListener = new ImageListener() {
        @Override
        public void setImageForPosition(int position, ImageView imageView) {
            imageView.setImageResource(sampleImages[position]);
        }
    };
    public void refresh() {
        Call<GetItem> ItemCall = mApiInterface.getItem();
        ItemCall.enqueue(new Callback<GetItem>() {
            @Override
            public void onResponse(Call<GetItem> call, Response<GetItem>
                    response) {
                List<Item> itemList = response.body().getListDataItem();
                Log.d("Retrofit Get", "Jumlah data Item: " +
                        String.valueOf(itemList.size()));
                mAdapter = new ItemAdapter(itemList);
                mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<GetItem> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }

    @Override
    public void onClick(View v) {
  
        if(v == filterjenisbaju){
            Intent DetailItemFragment = new Intent(getActivity(), DetailItemFragment.class);
            startActivity(DetailItemFragment);
        }
        if(v == filterjeniskain){
            Intent loginActivity = new Intent(getActivity(), MainActivity.class);
            startActivity(loginActivity);
        }
    }



}
