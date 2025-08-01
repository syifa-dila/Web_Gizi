    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('rules', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('diseases_id');
                $table->unsignedBigInteger('gejalas_id');
                $table->decimal('cf_pakar', 5,1);
                $table->timestamps();

                $table->foreign('diseases_id')->references('id')->on('diseases')->onDelete('cascade');
                $table->foreign('gejalas_id')->references('id')->on('gejalas')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('rules');
        }
    };
