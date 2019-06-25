package com.example.customshirt;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import com.example.customshirt.Adapter.ItemAdapter;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageListener;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements View.OnClickListener{

    private Button filterjenisbaju;
    private Button filterjeniskain;
    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static PengirimanActivity ma;

    CarouselView carouselView;

    int[] sampleImages = {R.drawable.image_1, R.drawable.image_2, R.drawable.image_3};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);



        filterjenisbaju = (Button) findViewById(R.id.filterjenisbaju);
        filterjenisbaju.setOnClickListener(this);
        filterjeniskain = (Button) findViewById(R.id.filterjeniskain);
        filterjeniskain.setOnClickListener(this);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        mLayoutManager = new GridLayoutManager(this,2);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        refresh();

        carouselView = (CarouselView) findViewById(R.id.carouselView);
        carouselView.setPageCount(sampleImages.length);

        carouselView.setImageListener(imageListener);
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
            startActivity(new Intent(this,LoginActivity.class));
        }
        if(v == filterjeniskain){
            startActivity(new Intent(this,ButtonNav.class));
        }
    }
}