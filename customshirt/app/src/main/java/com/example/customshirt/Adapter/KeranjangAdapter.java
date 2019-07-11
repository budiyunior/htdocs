package com.example.customshirt.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.customshirt.DetailItem;
import com.example.customshirt.DetailItemFragment;
import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.PopupDeleteCart;
import com.example.customshirt.R;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class KeranjangAdapter extends RecyclerView.Adapter<KeranjangAdapter.MyViewHolder>{
    List<Keranjang> mKeranjangList;
    ApiInterface mApiInterface;
    public TextView mTextViewId;
    Context context;
    public KeranjangAdapter(List<Keranjang> KeranjangList,Context context) {
        mKeranjangList = KeranjangList;
        this.context=context;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.keranjang_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, final int position) {
        holder.mTextViewId.setText(mKeranjangList.get(position).getId_desain());
        holder.mTextViewNama.setText(mKeranjangList.get(position).getNama_desain());
//        holder.mTextViewHarga.setText(mKeranjangList.get(position).getNama_desain());
        holder.mTextViewTotal.setText( "Rp. "+mKeranjangList.get(position).getSubtotal_harga());
        holder.mTextViewUkuran.setText( mKeranjangList.get(position).getUkuran_shirt());
        holder.mTextViewJumlah.setText( mKeranjangList.get(position).getJumlah());
        final String urlGambar = "http://customshirt.webtif.com/upload/product/"+mKeranjangList.get(position).getGambar();
        Picasso.with(this.context).load(urlGambar).into(holder.imageGambar);
        Log.e("Berhasil", "berhasil" + urlGambar);
        holder.mTextViewJumlah.setText( mKeranjangList.get(position).getJumlah());
        holder.btn_hapus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent mIntent = new Intent(v.getContext(), PopupDeleteCart.class);
                mIntent.putExtra("id_desain", mKeranjangList.get(position).getId_desain());
                v.getContext().startActivity(mIntent);

            }
        });
//        btn_hapus.setOnClickListener(this);


//        int overTotalPrice=0;
//        int oneTyprProductTprice = (Integer.valueOf(mKeranjangList.get(position).getSubtotal_harga()) * Integer.valueOf(mKeranjangList.get(position).getJumlah()));
//        overTotalPrice = overTotalPrice + oneTyprProductTprice;

    }


    @Override
    public int getItemCount() {
        return mKeranjangList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewHarga,mTextViewWarna,mTextViewUkuran,mTextViewJumlah,
                    mTextViewTotal;
        public ImageView imageGambar;
        public Button btn_hapus;
        ApiInterface mApiInterface;
        public MyViewHolder(View keranjangView) {
            super(keranjangView);
            mTextViewId = (TextView) itemView.findViewById(R.id.id_desain);
            mTextViewNama = (TextView) keranjangView.findViewById(R.id.tv_nama_item);
//            mTextViewWarna = (TextView) keranjangView.findViewById(R.id.txt_warna);
            mTextViewUkuran = (TextView) keranjangView.findViewById(R.id.txt_ukuran);
            mTextViewJumlah = (TextView) keranjangView.findViewById(R.id.txt_jumlah);
            mTextViewHarga = (TextView) keranjangView.findViewById(R.id.txt_harga);
            mTextViewTotal = (TextView) keranjangView.findViewById(R.id.txt_total);
            btn_hapus = (Button) keranjangView.findViewById(R.id.btn_edit);
            imageGambar = (ImageView) keranjangView.findViewById(R.id.img_item);
            mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        }
    }


}
