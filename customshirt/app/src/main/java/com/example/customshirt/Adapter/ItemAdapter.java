package com.example.customshirt.Adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

//import com.example.customshirt.EditActivity;
import com.example.customshirt.DetailItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.R;

import java.util.List;
import java.util.UUID;


public class ItemAdapter extends RecyclerView.Adapter<ItemAdapter.MyViewHolder> {
    List<Item> mItemList;

    public ItemAdapter(List<Item> ItemList) {
        mItemList = ItemList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, final int position) {
        //holder.mTextViewId.setText("Id = " + mItemList.get(position).getId_item());
        holder.mTextViewNama.setText(mItemList.get(position).getNama_item());
        holder.mTextViewHarga.setText("Rp." + mItemList.get(position).getHarga_satuan());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent = new Intent(view.getContext(), DetailItem.class);
                mIntent.putExtra("Id_item", mItemList.get(position).getId_item());
                mIntent.putExtra("Nama", mItemList.get(position).getNama_item());
                mIntent.putExtra("Jenis_item", mItemList.get(position).getId_jenis_item());
                mIntent.putExtra("Harga",mItemList.get(position).getHarga_satuan());
                mIntent.putExtra("Berat", mItemList.get(position).getBerat_satuan() );
                mIntent.putExtra("Deskripsi", mItemList.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return mItemList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewHarga;

        public MyViewHolder(View itemView) {
            super(itemView);
//            mTextViewId = (TextView) itemView.findViewById(R.id.tvId);
            mTextViewNama = (TextView) itemView.findViewById(R.id.tvNama);
            mTextViewHarga = (TextView) itemView.findViewById(R.id.tvHarga);
        }
    }
}
