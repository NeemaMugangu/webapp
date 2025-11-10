use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('farmers', function (Blueprint $table) {
            $table->bigIncrements('farmer_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('location')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('profile_details')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('farmers');
    }
};
