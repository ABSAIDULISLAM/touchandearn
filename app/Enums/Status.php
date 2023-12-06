<?php
namespace App\Enums;

enum Status :string
{
    case Active = "active";
    case Pending = "pending";
    case Admin = "admin";
    case Subadmin = "sub_admin";
    case Member = "member";
    case Vendor = "vendor";
    case User = 'user';
    case Rejected = "rejected";
    case Progress = "progress";
    case Delivered = "delivered";
    case Cancel = "cancel";
    case Hold = 'hold';
    case Success = 'success';
    case Deactivate = "deactivate";
    case Completed = "completed";
}
