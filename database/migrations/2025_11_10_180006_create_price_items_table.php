use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('price_items', function (Blueprint $table) {
            $table->bigIncrements('price_item_id');
            $table->string('region');
            $table->decimal('average_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('price_items');
    }
};
