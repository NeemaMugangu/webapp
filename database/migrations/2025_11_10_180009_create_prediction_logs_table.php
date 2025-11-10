use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('prediction_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produce_id')->nullable();
            $table->string('model_version')->nullable();
            $table->json('features')->nullable(); // demand, weather snapshot, etc.
            $table->decimal('predicted_price', 10, 2)->nullable();
            $table->timestamp('predicted_at')->useCurrent();
            $table->timestamps();

            $table->foreign('produce_id')->references('produce_id')->on('produces')->nullOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('prediction_logs');
    }
};
