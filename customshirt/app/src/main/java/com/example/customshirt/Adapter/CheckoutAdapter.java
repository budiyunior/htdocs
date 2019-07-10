package com.example.customshirt.Adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.PopupDeleteCart;
import com.example.customshirt.R;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

public class CheckoutAdapter extends RecyclerView.Adapter<CheckoutAdapter.MyViewHolder>{
    List<Keranjang> mKeranjangList;

    public CheckoutAdapter(List<Keranjang> KeranjangList) {
        mKeranjangList = KeranjangList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.checkout_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(CheckoutAdapter.MyViewHolder holder, final int position) {
//        holder.mTextViewId.setText(mKeranjangList.get(position).getId_desain());
        holder.mTextViewNama.setText(mKeranjangList.get(position).getNama_desain());
//        holder.mTextViewHarga.setText(mKeranjangList.get(position).getNama_desain());
        holder.mTextViewTotal.setText( "Rp. "+mKeranjangList.get(position).getSubtotal_harga());

    }


    @Override
    public int getItemCount() {
        return mKeranjangList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewHarga,mTextViewWarna,mTextViewUkuran,mTextViewJumlah,
                mTextViewTotal;
        public Button btn_hapus;
        ApiInterface mApiInterface;
        public MyViewHolder(View keranjangView) {
            super(keranjangView);
//            mTextViewId = (TextView) itemView.findViewById(R.id.id_desain);
            mTextViewNama = (TextView) keranjangView.findViewById(R.id.tv_nama_item);
//            mTextViewWarna = (TextView) keranjangView.findViewById(R.id.txt_warna);
//            mTextViewUkuran = (TextView) keranjangView.findViewById(R.id.txt_ukuran);
//            mTextViewJumlah = (TextView) keranjangView.findViewById(R.id.txt_jumlah);
            mTextViewHarga = (TextView) keranjangView.findViewById(R.id.txt_harga);
            mTextViewTotal = (TextView) keranjangView.findViewById(R.id.txt_total);
//            btn_hapus = (Button) keranjangView.findViewById(R.id.btn_edit);
            mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        }
    }
}
