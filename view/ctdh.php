<style>
    .jXurFV {
    flex: 1 1 0%;
    }
    .iOhDoD .heading {
    font-size: 19px;
    line-height: 21px;
    margin: 20px 0px 15px;
    color: black;
    text-align: center;
    }
    .iOhDoD .inner {
    background-color: rgb(255, 255, 255);
    border-radius: 4px;
    padding: 0px 30px 0px;
    min-height: 400px;
    }
    .iOhDoD table {
        border-collapse: collapse;
        width: 100%;
        word-break: break-word;
    }
    .iOhDoD tr {
        border-bottom: 1px solid rgb(244, 244, 244);
    }
    .iOhDoD th, .iOhDoD td {
        min-width: 130px;
        padding: 20px 15px;
        color: #080808;
        font-size: 15px;
        font-weight: 400;
        text-align: left;
    }
</style>
<div class="Account__StyledAccountLayoutInner-sc-1d5h8iz-1 jXurFV">
    <div class="styles__StyledAccountListOrder-sc-6t66uv-0 iOhDoD">
        <div class="heading">ĐƠN HÀNG CỦA TÔI</div><div class="inner">
            <table>
                <thead></thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày mua</th>
                    <th>Ngày giao</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái đơn hàng</th>
                </tr>
                <?php
                    if(is_array($h)){
                        foreach ($h as $donhang) {
                            extract($donhang);
                            $status=$hd->get_status($donhang['status']);
                            echo '
                                <tr>
                                    <td><strong>MDH'.$id_orders.'</strong></td>
                                    <td>'.$orders_day.'</td>
                                    <td>'.$delivery_day.'</td>
                                    <td></td>
                                    <td>'.number_format($total_money)."".'</td>
                                    <td>'.$status.'</td>
                                </tr> 
                            ';
                        }
                    }
                ?>
                <tbody>         
                </tbody>
            </table>
        </div>
    </div>
</div>